{{--<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">--}}
{{--    <div>--}}
{{--        {{ $logo }}--}}
{{--    </div>--}}

{{--    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}
{{--</div>--}}

<section class="h-full gradient-form bg-gray-200 md:h-screen">
    <div class="container py-12 px-6 h-full mx-auto">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
                <div class="block bg-white shadow-lg rounded-lg">
                    <div class="lg:flex lg:flex-wrap g-0">
                        <div class="lg:w-6/12 px-4 md:px-0 py-4">
                            <div class="md:p-12 md:mx-6">
                                <div class="items-center">
                                    {{ $logo }}
                                </div>
                                {{ $slot }}
                            </div>
                        </div>
                        <div
                            class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                            style="
                    background: linear-gradient(to right, #78C5DC, #97DEE7, #B7ECEA, #9CECFF);
                  "
                        >
                            <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                <h4 class="text-xl font-semibold mb-6">บานประตูไม้สัก และไม้จำปา พร้อมด้วยวงกบไม้แดง ให้เราได้เป็นส่วนหนึ่งของบ้านหลังงาม</h4>
                                <p class="text-sm">
                                    ร้านแสงอรุณ ดอนเมืองเรามีจำหน่าย และรับผลิตตามขนาดที่ต้องการ
                                    ติดต่อ สุชาย โทร 094-293-5644
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
