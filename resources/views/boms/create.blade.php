@extends('layouts.main')

@section('content')
    <h1 class="text-2xl font-bold flex justify-start my-3">สร้าง build of materials</h1>
    <form action="{{ route('boms.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="flex flex-col space-y-2 lg:w-1/2 md:w-3/4 w-full">
            <label for="selected_product" class="font-bold text-lg">เลือกสินค้า</label>
            <select name="selected_product" class="rounded-lg" value="" required>
                <option value="" selected disabled hidden></option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->id.'_'.$product->p_title }}</option>
                @endforeach
            </select>
            <label for="selected_product" class="font-bold text-lg">รายละเอียดเพิ่มเติม</label>
            <textarea name="description" class="rounded-lg" cols="30" rows="2"></textarea>
            <div class="flex items-center space-x-2">
                <input type="radio" id="active" name="status" value="1" required>
                <label for="active">พร้อมใช้งาน</label>
                <input type="radio" id="inactive" name="status" value="0" required>
                <label for="inactive">ไม่พร้อมใช้งาน</label>
            </div>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg my-4">
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
                            @sortablelink('m_description')
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            @sortablelink('m_size')
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            @sortablelink('m_stock')
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">Quantity
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @if($materials->count())
                    @foreach($materials as $key => $material)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6 ">{{ $material->id }}</td>
                            <td class="py-4 px-6 ">{{ $material->m_description }}</td>
                            <td class="py-4 px-6 ">{{ $material->m_size }}</td>
                            <td class="py-4 px-6 ">
                                {{ $material->m_stock }}
                            </td>
                            <td class="py-4 px-6">
                                <input class="max-w-[100px] border-gray-500 rounded-lg"
                                       name="{{ $material->id . "_quantity" }}" type="number" inputmode="numeric" value=0 min=0 max="{{ $material->m_stock }}" required />
                                ชิ้น
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="flex my-3 justify-end">
            <button
                type="submit"
                class="bg-blue-600 inline-block px-12 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >ยืนยัน</button>
        </div>
    </form>


@endsection

