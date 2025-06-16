@php
    $costs = isset($quotation_data) ? $quotation_data['formSelects']['costs'] : $costs;
@endphp

<div class="p-6 border-b-2 border-blue-600 bg-white shadow-sm">
    <!-- Encabezado mejorado -->
    <div class="flex items-center mb-6 sm:flex-row flex-col">
        <span class="inline-flex items-center justify-center p-3 rounded-full bg-blue-50 text-blue-600 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <div class="flex justify-center items-center gap-2 sm:flex-row flex-col">
            <h3 class="text-lg font-semibold text-gray-800">Costos Logísticos</h3>
            <p class="text-sm text-gray-500">Agrege los costos aplicables a esta cotización</p>
        </div>


    </div>
    <div class="mb-2">
        <p class="text-sm text-gray-700">El costo paralelo solo se aplicara y se guardara en la cotización si la opcion "Cambio
            paralelo en Bs" <span class="text-blue-500 font-bold">esta activa.</span></p>
        <div class="flex sm:flex-row flex-col gap-3 mt-2">
            <div class="flex items-center gap-3 my-2">
                <input type="checkbox" id="parallel_exchange_checkbox" name="is_parallel"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" value="1"
                    @if (old('is_parallel', isset($quotation_data) ? $quotation_data['formData']['is_parallel'] : 0)) checked @endif>
                <label for="parallel_exchange_checkbox" class="font-medium">Cambio paralelo en Bs.</label>
            </div>
            <div id="juncture_container" class="@if (!old('juncture', isset($quotation_data) ? $quotation_data['formData']['juncture'] : '')) hidden @endif">
                <div class="flex items-center gap-2 mt-1">
                    <label for="juncture"
                        class="whitespace-nowrap block text-sm font-medium text-gray-700 mb-1">Coyuntura
                        (Opcional) %</label>
                    <input type="text" id="juncture" name="juncture" placeholder="113"
                        value="{{ old('juncture', isset($quotation_data) ? $quotation_data['formData']['juncture'] : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
            </div>
        </div>
    </div>
    <!-- Search input -->
    <div class="relative max-w-md mb-4">
        <input type="text" id="costSearch"
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Buscar costos..." onkeyup="searchCosts(event)"
            onblur="setTimeout(() => document.getElementById('searchCostResults').classList.add('hidden'), 200)"
            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
            </svg>
        </div>
    </div>

    <!-- Search results container -->
    <div id="searchCostResults" class="mt-2 hidden border border-gray-200 rounded-lg max-h-60 overflow-y-auto max-w-md">
        <!-- Results will be populated here by JavaScript -->
    </div>

    <!-- Selected costs with amount inputs -->
    <div id="selectedCosts" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-6">
        @foreach ($costs as $cost)
            @php
                $oldEnabled = old("costs.{$cost->id}.enabled", null);
                $costEnabled = false;
                $costAmount = '';
                $costAmountParallel = '';
                if (
                    isset($quotation_data['formData']['costs']) &&
                    isset($quotation_data['formData']['costs'][$cost->id])
                ) {
                    $costEnabled = true;
                    $costAmount = $quotation_data['formData']['costs'][$cost->id]['amount'] ?? '';
                    $costAmountParallel = $quotation_data['formData']['costs'][$cost->id]['amount_parallel'] ?? '';
                }
                $isEnabled = $oldEnabled !== null ? (bool) $oldEnabled : $costEnabled;
                $amount = old("costs.{$cost->id}.amount", $costAmount);
                $amountParallel = old("costs.{$cost->id}.amount_parallel", $costAmountParallel);
            @endphp

            @if ($isEnabled)
                <div class="cost-item bg-white p-4 rounded-lg border border-gray-200 shadow-sm"
                    data-cost-id="{{ $cost->id }}">
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="font-medium text-gray-800">{{ $cost->name }}</h4>
                        <button type="button" class="text-red-500 hover:text-red-700 text-lg"
                            onclick="removeCost('{{ $cost->id }}')">
                            &times;
                        </button>
                    </div>

                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Importe principal</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="currency-symbol text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" step="0.01" min="0"
                                name="costs[{{ $cost->id }}][amount]" value="{{ $amount }}"
                                class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                placeholder="0.00" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="currency-code text-gray-500 sm:text-sm">USD</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Importe paralelo</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="currency-symbol text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" step="0.01" min="0"
                                name="costs[{{ $cost->id }}][amount_parallel]" value="{{ $amountParallel }}"
                                class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                placeholder="0.00">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="currency-code text-gray-500 sm:text-sm">USD</span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="costs[{{ $cost->id }}][enabled]" value="1">
                    <input type="hidden" name="costs[{{ $cost->id }}][cost_id]" value="{{ $cost->id }}">
                    <input type="hidden" name="costs[{{ $cost->id }}][concept]" value="{{ $cost->name }}">
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>
    const checkbox = document.getElementById('parallel_exchange_checkbox');
    const junctureContainer = document.getElementById('juncture_container');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            junctureContainer.classList.remove('hidden');
            this.value = '1'; // Asegurarse que el valor es 1 cuando está marcado
        } else {
            junctureContainer.classList.add('hidden');
            document.getElementById('juncture').value = '';
            this.value = '0'; // Esto no es estrictamente necesario porque el hidden field manejará el 0
        }
    });
    // Array to store all available costs
    const allCosts = [
        @foreach ($costs as $cost)
            {
                id: "{{ $cost->id }}",
                name: "{{ $cost->name }}"
            },
        @endforeach
    ];

    // Close results when clicking outside
    document.addEventListener('click', function(event) {
        const searchContainer = document.querySelector('.relative.max-w-md');
        const resultsContainer = document.getElementById('searchCostResults');

        if (!searchContainer.contains(event.target) && !resultsContainer.contains(event.target)) {
            resultsContainer.classList.add('hidden');
        }
    });

    function searchCosts(event) {
        // Close on ESC key
        if (event.key === 'Escape') {
            document.getElementById('searchCostResults').classList.add('hidden');
            document.getElementById('costSearch').blur();
            return;
        }

        const input = document.getElementById('costSearch');
        const filter = input.value.toUpperCase();
        const resultsContainer = document.getElementById('searchCostResults');

        // Clear previous results
        resultsContainer.innerHTML = '';

        if (filter.length < 2) {
            resultsContainer.classList.add('hidden');
            return;
        }

        // Filter costs
        const filteredCosts = allCosts.filter(cost =>
            cost.name.toUpperCase().includes(filter) &&
            !document.querySelector(`#selectedCosts [data-cost-id="${cost.id}"]`)
        );

        if (filteredCosts.length === 0) {
            resultsContainer.innerHTML = '<div class="p-3 text-gray-500">No se encontraron costos</div>';
            resultsContainer.classList.remove('hidden');
            return;
        }

        // Add results to container
        filteredCosts.forEach(cost => {
            const costElement = document.createElement('div');
            costElement.className = 'p-3 hover:bg-gray-100 cursor-pointer text-base';
            costElement.textContent = cost.name;
            costElement.onclick = () => {
                addSelectedCost(cost);
                resultsContainer.classList.add('hidden');
            };
            resultsContainer.appendChild(costElement);
        });

        resultsContainer.classList.remove('hidden');
    }

    function addSelectedCost(cost) {
        const selectedCosts = document.getElementById('selectedCosts');

        // Check if cost is already added
        if (document.querySelector(`#selectedCosts [data-cost-id="${cost.id}"]`)) {
            return;
        }

        // Add to selected costs with input fields
        const costHtml = `
            <div class="cost-item bg-white p-4 rounded-lg border border-gray-200 shadow-sm" data-cost-id="${cost.id}">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="font-medium text-gray-800">${cost.name}</h4>
                    <button type="button" class="text-red-500 hover:text-red-700 text-lg"
                        onclick="removeCost('${cost.id}')">
                        &times;
                    </button>
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Costo </label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="number" step="0.01" min="0" name="costs[${cost.id}][amount]"
                            class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="0.00" required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="currency-code text-gray-500 sm:text-sm">USD</span>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Costo paralelo (Opcional)</label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="number" step="0.01" min="0" name="costs[${cost.id}][amount_parallel]"
                            class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="0.00">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="currency-code text-gray-500 sm:text-sm">USD</span>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="costs[${cost.id}][enabled]" value="1">
                <input type="hidden" name="costs[${cost.id}][cost_id]" value="${cost.id}">
                <input type="hidden" name="costs[${cost.id}][concept]" value="${cost.name}">
            </div>
        `;

        selectedCosts.insertAdjacentHTML('beforeend', costHtml);

        // Clear search
        document.getElementById('costSearch').value = '';
        document.getElementById('searchCostResults').classList.add('hidden');

        // Focus on the new amount input
        const newInput = document.querySelector(
            `#selectedCosts [data-cost-id="${cost.id}"] input[name="costs[${cost.id}][amount]"]`);
        if (newInput) {
            newInput.focus();
        }
    }

    function removeCost(id) {
        const costElement = document.querySelector(`#selectedCosts [data-cost-id="${id}"]`);
        if (costElement) {
            costElement.remove();
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        if (checkbox.checked) {
            junctureContainer.classList.remove('hidden');
        } else {
            junctureContainer.classList.add('hidden');
        }
    });
</script>
