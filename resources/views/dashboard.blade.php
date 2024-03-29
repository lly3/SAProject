@extends('layouts.main')

@section('content')
    <h1 class="text-2xl font-bold flex justify-start my-3">รายการสั่งซื้อทั้งหมด</h1>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('id')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('email')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('p_title')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('o_status')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('amount')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-7">
                    <div class="flex items-center">
                        @sortablelink('o_placing_date')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Issue Invoice</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Confirm</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Cancel</span>
                </th>
            </tr>
            </thead>
            <tbody>
                @if($orders->count())
                    @foreach($orders as $key => $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6 ">{{ $order->id }}</td>
                            <td class="py-4 px-6 ">{{ $order->user->email }}</td>
                            <td class="py-4 px-6 ">
                                <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    {{ $order->products->reduce(function($key,$product){ return $product->p_title; }) }}
                                </a>
                            </td>
                            <td class="py-4 px-6 ">{{ $order->o_status }}</td>
                            <td class="py-4 px-6 ">{{ $order->products->reduce(function($key, $product){ return $product->pivot->op_amount; }) }}</td>
                            <td class="py-4 px-6 ">{{ date('d-m-Y', strtotime($order->o_placing_date)) }}</td>
                            <td class="py-4 px-6 text-right">
                                <a onclick="return confirm('Are you sure?')" href="{{ route('invoices.issueInvoice', ['order' => $order->id]) }}" class="@if(\App\Models\Invoice::where('order_id', $order->id)->count() || $order->o_status != 2) pointer-events-none text-blue-300 @endif font-medium text-blue-600 dark:text-blue-500 hover:underline">พิมพ์ใบเสร็จ</a>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a onclick="return confirm('Are you sure?')" href="{{ route('orders.finish', ['order' => $order->id]) }}" class="@if($order->o_status == 3 || $order->o_status == 2) pointer-events-none text-blue-300 @endif font-medium text-blue-600 dark:text-blue-500 hover:underline">เสร็จสิ้น</a>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a onclick="return confirm('Are you sure?')" href="{{ route('orders.cancel', ['order' => $order->id]) }}" class="@if($order->o_status == 3 || $order->o_status == 2) pointer-events-none text-red-300 @endif font-medium text-red-600 dark:text-red-500 hover:underline">ยกเลิก</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $orders->appends(\Request::except('page'))->render() !!}
    </div>

@endsection
