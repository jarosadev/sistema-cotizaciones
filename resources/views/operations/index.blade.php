@if (Auth::user()->role_id == '1')
    @php $layout = 'layouts.admin'; @endphp
@else
    @php $layout = 'layouts.operator'; @endphp
@endif

@extends($layout)



@section('dashboard-option')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-xl shadow-sm p-3 mb-6 border border-gray-200">
            <div class="flex sm:flex-row flex-col items-center gap-6">
                <h2 class="text-xl font-black text-gray-800">
                    <span class="text-[#0B628D]">Operaciones</span>
                </h2>

                <!-- Barra de búsqueda mejorada -->
                <div class="relative max-w-md w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="searchInput"
                        class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-[#0B628D] focus:border-[#0B628D] sm:text-sm"
                        placeholder="Buscar operación...">
                    <div id="searchClear" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex sm:flex-row flex-col items-center gap-6 max-sm:justify-center">
                <div class="flex items-center">
                    <input id="filterPending" type="checkbox"
                        class="h-4 w-4 text-[#0B628D] focus:ring-[#0B628D] border-gray-300 rounded">
                    <label for="filterPending" class="ml-2 text-sm text-gray-700">
                        Mostrar solo operaciones abiertas
                    </label>
                </div>
                <a href="{{ route('operations.create') }}"
                    class="flex items-center justify-center px-4 py-2 bg-[#0B628D] hover:bg-[#19262c] text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Crear operacion
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                CI / NIT
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                N° Operacion
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de emision
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody id="operationsTableBody" class="bg-white divide-y divide-gray-200">
                        @if (count($billingNotes) === 0)
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                    No hay operaciones registradas.
                                </td>
                            </tr>
                        @else
                            @foreach ($billingNotes as $operation)
                                <tr class="operation-row hover:bg-gray-50 transition-colors duration-150"
                                    data-customer="{{ strtolower($operation->customer->name) }}"
                                    data-customer-nit="{{ strtolower($operation->customer_nit) }}"
                                    data-op_number="{{ strtolower($operation->op_number) }}"
                                    data-emission_date="{{ strtolower($operation->emission_date) }}"
                                    data-status="{{ strtolower($operation->status) }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $operation->quotation->customer->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $operation->customer_nit }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $operation->op_number }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $operation->emission_date }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if (strtolower($operation->status) == 'pending')
                                            <div
                                                class="text-sm text-white bg-yellow-500 rounded-full px-3 py-1 inline-flex items-center justify-center">
                                                <span class="mr-1 font-bold">•</span> Abierta
                                            </div>
                                        @elseif (strtolower($operation->status) == 'completed')
                                            <div
                                                class="text-sm text-white bg-green-500 rounded-full px-3 py-1 inline-flex items-center justify-center">
                                                <span class="mr-1 font-bold">•</span> Cerrada
                                            </div>
                                        @else
                                            <div
                                                class="text-sm text-white bg-red-500 rounded-full px-3 py-1 inline-flex items-center justify-center">
                                                <span class="mr-1 font-bold">•</span> Rechazada
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('operations.show', $operation->id) }}"
                                                class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-50 transition-colors duration-200"
                                                title="Ver detalle">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('operations.edit', $operation->id) }}"
                                                class="text-yellow-600 hover:text-yellow-900 p-1 rounded-full hover:bg-yellow-50 transition-colors duration-200"
                                                title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <x-delete-button route="operations.destroy" :id="$operation->id" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchClear = document.getElementById('searchClear');
            const filterPendingCheckbox = document.getElementById('filterPending');
            const operationRows = document.querySelectorAll('.operation-row');
            const noResultsMessage = @json(__('No se encontraron resultados'));

            // Mostrar/ocultar botón de limpiar búsqueda
            searchInput.addEventListener('input', function() {
                searchClear.classList.toggle('hidden', this.value === '');
                filterOperations();
            });

            // Limpiar búsqueda
            searchClear.addEventListener('click', function() {
                searchInput.value = '';
                searchClear.classList.add('hidden');
                filterOperations();
                searchInput.focus();
            });

            // Filtrar por estado
            filterPendingCheckbox.addEventListener('change', filterOperations);

            // Función mejorada de filtrado
            function filterOperations() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const showOnlyPending = filterPendingCheckbox.checked;
                let hasVisibleRows = false;

                operationRows.forEach(row => {
                    const customer = row.getAttribute('data-customer');
                    const nit = row.getAttribute('data-nit');
                    const opNumber = row.getAttribute('data-op_number');
                    const emitionDate = row.getAttribute('data-emition-date');
                    const status = row.getAttribute('data-status');

                    // Verificar coincidencia con el término de búsqueda
                    const matchesSearch = searchTerm === '' ||
                        customer.includes(searchTerm) ||
                        nit.includes(searchTerm) ||
                        emitionDate.includes(searchTerm) ||
                        opNumber.includes(searchTerm);

                    // Verificar estado
                    const matchesStatus = !showOnlyPending || status === 'pending';

                    if (matchesSearch && matchesStatus) {
                        row.style.display = '';
                        hasVisibleRows = true;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Mostrar mensaje si no hay resultados
                const noResultsRow = document.querySelector('#operationsTableBody tr[data-no-results]');
                if (!hasVisibleRows && operationRows.length > 0) {
                    if (!noResultsRow) {
                        const tr = document.createElement('tr');
                        tr.setAttribute('data-no-results', 'true');
                        tr.innerHTML =
                            `<td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">${noResultsMessage}</td>`;
                        document.getElementById('operationsTableBody').appendChild(tr);
                    }
                } else if (noResultsRow) {
                    noResultsRow.remove();
                }
            }

            // Filtro inicial
            filterOperations();
        });
    </script>
@endsection
