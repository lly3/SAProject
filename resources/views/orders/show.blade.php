{{-- resources/views/posts/show.blade.php --}}

@extends('layouts.main')

@section('content')

    {{-- stepper  --}}
    <div class="md:px-24">
        <div class="md:mx-4 md:p-4 mb-12">
            <div id="stepper-container" class="flex items-center">
                <div class="flex items-center text-teal-600 relative">
                    <div class="@if($order->o_status == 3) stepper-cancel @else stepper-inactive @endif">
                    </div>
                    <div class="@if($order->o_status == 3) stepper-cancel-text @else stepper-inactive-text @endif">คำสั่งซื้อถูกยกเลิก</div>
                </div>
                <div class="stepper-inactive-line"></div>
                <div class="flex items-center text-teal-600 relative">
                    <div class="@if($order->o_status == 0) stepper-active @elseif($order->o_status != 3) stepper-passed @else stepper-inactive @endif @if($order->o_status == 1) stepper-passed @else stepper-passed @endif @if($order->o_status == 2) stepper-passed @endif">
                    </div>
                    <div class="@if($order->o_status != 3) stepper-active-text @else stepper-inactive-text @endif">รอการชำระเงิน</div>
                </div>
                <div class="@if($order->o_status == 0)stepper-inactive-line @elseif($order->o_status != 3) stepper-active-line @else stepper-inactive-line @endif"></div>
                <div class="flex items-center text-white relative">
                    <div class="@if($order->o_status == 1) stepper-active @elseif($order->o_status == 0) stepper-inactive @elseif($order->o_status != 3) stepper-passed @else stepper-inactive @endif @if($order->o_status == 2) stepper-passed @endif">
                    </div>
                    <div class="@if($order->o_status == 0) stepper-inactive-text @elseif($order->o_status != 3) stepper-active-text @else stepper-inactive-text @endif">กำลังดำเนินการ</div>
                </div>
                <div class="@if($order->o_status == 2) stepper-active-line @else stepper-inactive-line @endif"></div>
                <div class="flex items-center text-gray-500 relative">
                    <div class="@if($order->o_status == 2) stepper-active @else stepper-inactive @endif">
                    </div>
                    <div class="@if($order->o_status == 2) stepper-active-text @else stepper-inactive-text @endif">เสร็จสิ้น</div>
                </div>
            </div>
        </div>
    </div>

    {{-- table  --}}
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
                        @sortablelink('p_title')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('op_quantity')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        @sortablelink('op_amount')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-7">
                    <div class="flex items-center">
                        @sortablelink('p_wood_type')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" class="py-3 px-7">
                    <div class="flex items-center">
                        @sortablelink('p_size')
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            @if($products->count())
                @foreach($products as $key => $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 ">{{ $order->id }}</td>
                        <td class="py-4 px-6 ">{{ $product->p_title }}</td>
                        <td class="py-4 px-6 ">{{ $product->pivot->op_quantity }}</td>
                        <td class="py-4 px-6 ">{{ $product->pivot->op_amount }}</td>
                        <td class="py-4 px-6 ">{{ $product->p_wood_type }}</td>
                        <td class="py-4 px-6 ">{{ $product->p_size }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="flex justify-end p-3">ราคาสินค้าทั้งหมด: <span class="font-bold pl-2">{{ $products->reduce(function($key, $product){ return $product->pivot->op_amount; }) }} บาท</span></div>
    </div>
    <div class="flex my-3 justify-end">
        <a
            href="{{ route('orders.cancel', ['order' => $order->id]) }}"
            onclick="return confirm('Are you sure?')"
            class="@if($order->o_status == 3 || $order->o_status == 2) pointer-events-none bg-red-400 @else bg-red-600 @endif inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
        >ยกเลิกคำสั่งซื้อ</a>
    </div>

@endsection


