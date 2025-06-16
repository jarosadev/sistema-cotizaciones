@if (Auth::user()->role_id == '1')
    @php $layout = 'layouts.admin'; @endphp
@elseif (Auth::user()->role_id == '2')
    @php $layout = 'layouts.commercial'; @endphp
@else
    @php $layout = 'layouts.operator'; @endphp
@endif

@extends($layout)

@section('dashboard-option')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 pb-5">
        <div
            class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-xl shadow-sm p-3 mb-6 border border-gray-200">
            <h2 class="text-xl font-black text-gray-800">
                <span class="text-[#0B628D]">Número de cotización: {{ $quotation_data['reference_number'] }}</span>
            </h2>

            <div class="flex sm:flex-row flex-col gap-2">
                @if ($quotation_data['status'] === 'accepted')
                    <form action="{{ route('quotations.updateStatus', $quotation_data['id']) }}" method="POST"
                        class="w-full sm:w-auto">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="pending" />
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 bg-[#0b8d41] hover:bg-[#588498] text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Cancelar confirmacion
                        </button>
                    </form>
                @endif

                @if ($quotation_data['status'] === 'pending')
                    <form action="{{ route('quotations.updateStatus', $quotation_data['id']) }}" method="POST"
                        class="w-full sm:w-auto">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="accepted" />
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 bg-[#0b8d41] hover:bg-[#588498] text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Confirmar cotizacion
                        </button>

                    </form>
                    <form action="{{ route('quotations.updateStatus', $quotation_data['id']) }}" method="POST"
                        class="w-full sm:w-auto">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="refused" />
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Rechazar cotizacion
                        </button>
                    </form>
                @endif
                @if ($quotation_data['status'] === 'refused')
                    <form action="{{ route('quotations.updateStatus', $quotation_data['id']) }}" method="POST"
                        class="w-full sm:w-auto">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="pending" />
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Cancelar Rechazo
                        </button>
                    </form>
                @endif

                <div class="flex space-x-2">
                    <a href="{{ route('quotations.index') }}"
                        class="flex items-center justify-center px-4 py-2 bg-[#0B628D] hover:bg-[#19262c] text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver a cotizaciones
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-3 mb-6 border border-gray-200">
            <div class="flex flex-col lg:flex-row gap-2 w-full justify-between items-center">
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-md">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('quotations.generate.download') }}" method="POST"
                    class="flex flex-col sm:flex-row gap-2 items-center w-full sm:w-auto">
                    @csrf
                    <input type="hidden" name="quotation_id" value="{{ $quotation_data['id'] }}" />
                    <div class="flex items-center bg-white rounded-lg border border-gray-200 p-1 shadow-sm">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="hidden" name="visible" value="0">
                            <input type="checkbox" name="visible"
                                class="form-checkbox h-6 w-6 text-[#4CAF50] rounded border-gray-300 focus:ring-[#4CAF50] mr-3 ml-2"
                                value="1" checked>
                            <span class="text-gray-700 font-medium flex items-center">
                                Fondo + Logo
                            </span>
                        </label>
                    </div>

                    <button type="submit"
                        class="flex items-center justify-center p-1.5 bg-gradient-to-r from-[#0B628D] to-[#0d7db5] hover:from-[#0d455e] hover:to-[#0B628D] text-white font-medium rounded-lg transition-all duration-300 shadow-md transform text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Generar Documento
                    </button>
                </form>

                <form action="{{ route('quotations.generate.excel.download') }}" method="POST"
                    class="flex flex-col sm:flex-row gap-2 items-center w-full sm:w-auto">
                    @csrf
                    <input type="hidden" name="quotation_id" value="{{ $quotation_data['id'] }}" />
                    <button type="submit"
                        class="flex-1 sm:flex-none p-1.5 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-lg text-sm font-semibold hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition-all duration-200 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Generar Cotización Interna (Excel)
                    </button>
                </form>

                @if ($quotation_data['status'] !== 'accepted')
                    <a href="{{ route('quotations.edit', $quotation_data['id']) }}"
                        class="flex items-center justify-center px-4 py-2 bg-[#FF9800] hover:bg-[#e68a00] text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md w-full sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Editar
                    </a>
                @endif
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Información General</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
                <!-- Columna 1: Moneda y Tipo de Cambio -->
                <div class="space-y-4">
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-sm font-medium text-gray-500">Moneda</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['currency'] }}</p>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-sm font-medium text-gray-500">Tipo de Cambio</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['exchange_rate'] }}</p>
                    </div>
                </div>

                <!-- Columna 2: Datos del Cliente -->
                <div class="space-y-4">
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-sm font-medium text-gray-500">NIT Cliente</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['NIT'] }}</p>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-sm font-medium text-gray-500">Nombre Cliente</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['customer_info']['name'] }}</p>
                    </div>
                </div>

                <!-- Columna 3: Contacto del Cliente -->
                <div class="space-y-4">
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-sm font-medium text-gray-500">Correo Cliente</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['customer_info']['email'] }}</p>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-sm font-medium text-gray-500">Teléfono Cliente</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['customer_info']['phone'] }}</p>
                    </div>
                </div>

                <div class="border-b border-gray-100 pb-2">
                    <p class="text-sm font-medium text-gray-500">Estado cotizacion</p>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold mt-2 
                        {{ $quotation_data['status'] === 'accepted'
                            ? 'bg-green-100 text-green-800'
                            : ($quotation_data['status'] === 'pending'
                                ? 'bg-yellow-100 text-yellow-800'
                                : 'bg-red-100 text-red-800') }}">
                        {{ $quotation_data['status'] === 'accepted'
                            ? 'Aceptada'
                            : ($quotation_data['status'] === 'pending'
                                ? 'Pendiente de respuesta'
                                : 'Rechazada') }}
                    </span>
                </div>


                <div class="border-b border-gray-100 pb-2">
                    <p class="text-sm font-medium text-gray-500">Referencia cliente</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $quotation_data['reference_customer'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Productos</h3>
            </div>

            <div class="p-6">
                @foreach ($quotation_data['products'] as $product)
                    <div class="mb-8 p-4 border border-gray-200 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                            @if (isset($product['name']))
                                <div class="space-y-2">
                                    <p class="text-sm font-medium text-gray-500">Nombre</p>
                                    <p class="text-gray-700">{{ $product['name'] }}</p>
                                </div>
                            @endif

                            <div>
                                <p class="text-sm font-medium text-gray-500">Peso</p>
                                <p class="text-gray-700">{{ $product['weight'] }} kg</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Volumen</p>
                                <p class="text-gray-700">{{ $product['volume'] }} {{ $product['volume_unit'] }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Cantidad</p>
                                <p class="text-gray-700">{{ $product['quantity'] }}
                                    {{ $product['quantity_description_name'] }}
                                </p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm font-medium text-gray-500">Origen</p>
                                <p class="text-gray-700">{{ $product['origin_name'] }}</p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm font-medium text-gray-500">Destino</p>
                                <p class="text-gray-700">{{ $product['destination_name'] }}</p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm font-medium text-gray-500">Incoterm</p>
                                <p class="text-gray-700">{{ $product['incoterm_name'] }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Servicios -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Servicios</h3>
                </div>

                <div class="p-6">
                    <!-- Servicios incluidos -->
                    <div class="mb-6 bg-green-50 p-4 rounded-lg border border-green-200">
                        <h3 class="font-bold text-green-800 mb-2">✅ Servicios incluidos</h3>
                        <ul>
                            @foreach ($quotation_data['services'] as $id => $status)
                                @if ($status == 'include')
                                    <li>{{ $quotation_data['service_names'][$id] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Servicios excluidos -->
                    <div class="bg-gray-100 p-4 rounded-lg border border-gray-200">
                        <h3 class="font-bold text-gray-700 mb-2">❌ Servicios excluidos</h3>
                        <ul>
                            @foreach ($quotation_data['services'] as $id => $status)
                                @if ($status == 'exclude')
                                    <li>{{ $quotation_data['service_names'][$id] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Costos -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Costos</h3>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Concepto
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Monto
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Monto Paralelo
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($quotation_data['costs'] as $cost)
                                    @if ($cost['enabled'] == '1')
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $cost['cost_name'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $quotation_data['currency'] }} {{ $cost['amount'] }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $quotation_data['currency'] }}
                                                {{ $cost['amount_parallel'] ? $cost['amount_parallel'] : '0.00' }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sección de Detalles de Cotización -->
        <div class="p-6  bg-white shadow-sm mb-6 rounded-lg">
            <div class="flex items-center mb-6 sm:flex-row flex-col">
                <span class="inline-flex items-center justify-center p-3 rounded-full bg-blue-50 text-blue-600 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </span>
                <h3 class="text-lg font-semibold text-gray-800">Detalles de cotización</h3>
                <p class="text-sm text-gray-500 sm:ml-2">Información adicional de la cotización</p>
            </div>

            <div class="flex flex-col gap-2 mb-5">
                <!-- Seguro -->
                <div class="flex gap-2 items-center">
                    <p class="block text-sm font-bold">Seguro: </p>
                    <p class="block text-sm text-gray-700">{{ $quotation_data['insurance'] }}</p>
                </div>

                <!-- Forma de pago -->
                <div class="flex flex-col gap-2">
                    <div class="flex gap-2 items-center">
                        <p class="block text-sm font-bold">Forma de Pago</p>
                        <p class="block text-sm text-gray-700">{{ $quotation_data['payment_method'] }}</p>
                    </div>

                    <!-- Validez -->
                    <div>
                        <div class="flex gap-2 items-center">
                            <p class="block text-sm font-bold">Validez</p>
                            <p class="block text-sm text-gray-700">{{ $quotation_data['validity'] }}</p>
                        </div>
                    </div>

                    <!-- Observaciones -->
                    <div>
                        <div class="flex gap-2 items-center">
                            <p class="block text-sm font-bold">Observaciones</p>
                            <p class="block text-sm text-gray-700">{{ $quotation_data['observations'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Resumen Total</h3>
            </div>

            <div class="p-6">
                <div class="flex gap-3 justify-end space-x-8 flex-wrap"> <!-- Añadido space-x-8 para separar los dos resúmenes -->
                    <!-- Resumen 1: Solo costos originales -->
                    <div class="w-full md:w-1/3 bg-gray-50 p-4 rounded-lg mr-0">
                        <h3 class="font-bold text-gray-700 mb-3">Resumen Original</h3>
                        @php
                            $subtotal_original = array_reduce(
                                $quotation_data['costs'],
                                function ($carry, $item) {
                                    $amount = is_numeric($item['amount']) ? (float)$item['amount'] : 0;
                                    return $carry + ($item['enabled'] == '1' ? $amount : 0);
                                },
                                0
                            );
                        @endphp
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">
                                {{ $quotation_data['currency'] }} {{ number_format($subtotal_original, 2) }}
                            </span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-bold text-lg text-[#0B628D]">
                                {{ $quotation_data['currency'] }} {{ number_format($subtotal_original, 2) }}
                            </span>
                        </div>
                    </div>
            
                    <!-- Resumen 2: Usa costos paralelos (si existen) -->
                    <div class="w-full md:w-1/3 bg-blue-50 p-4 rounded-lg">
                        <h3 class="font-bold text-gray-700 mb-3">Resumen con Costos Paralelos</h3>
                        @php
                            $subtotal_parallel = array_reduce(
                                $quotation_data['costs'],
                                function ($carry, $item) {
                                    $amount = isset($item['amount_parallel']) && is_numeric($item['amount_parallel']) 
                                        ? (float)$item['amount_parallel'] 
                                        : (is_numeric($item['amount']) ? (float)$item['amount'] : 0);
                                    return $carry + ($item['enabled'] == '1' ? $amount : 0);
                                },
                                0
                            );
                        @endphp
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">
                                {{ $quotation_data['currency'] }} {{ number_format($subtotal_parallel, 2) }}
                            </span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-bold text-lg text-[#0B628D]">
                                {{ $quotation_data['currency'] }} {{ number_format($subtotal_parallel, 2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
