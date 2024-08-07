<!-- About Page -->
@extends('main')
@section('title', 'Giới Thiệu')

@section('header')
<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Company Overview -->
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">Về Chúng Tôi</h2>
            <p class="text-lg text-gray-700 leading-relaxed">Chúng tôi là những người đam mê cung cấp thông tin chính xác và hữu ích về các chủ đề nóng nhất trong đời sống, du lịch, xã hội, và thể thao. Được thành lập với mục tiêu mang lại giá trị cho cộng đồng, chúng tôi luôn nỗ lực để cung cấp những tin tức và phân tích chất lượng nhất.</p>
        </div>

        <!-- History Section -->
        <div class="mt-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Lịch Sử</h3>
            <p class="text-lg text-gray-700 leading-relaxed">Được thành lập vào năm 2020, chúng tôi bắt đầu với một đội ngũ nhỏ nhưng đầy nhiệt huyết. Qua thời gian, chúng tôi đã không ngừng mở rộng đội ngũ và cải thiện chất lượng dịch vụ của mình, đạt được nhiều thành tựu đáng tự hào trong ngành công nghiệp truyền thông.</p>
        </div>

        <!-- Mission Section -->
        <div class="mt-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Sứ Mệnh</h3>
            <p class="text-lg text-gray-700 leading-relaxed">Sứ mệnh của chúng tôi là cung cấp thông tin trung thực và khách quan cho độc giả, giúp họ hiểu rõ hơn về thế giới xung quanh. Chúng tôi cam kết thực hiện việc này với sự chính xác và minh bạch cao nhất.</p>
        </div>

        
        </div>
    </div>
</section>
@endsection
@yield('footer')