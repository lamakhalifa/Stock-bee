<h2>رسالة جديدة</h2>

<p><strong>الاسم:</strong> {{ $data['name'] }}</p>
<p><strong>الإيميل:</strong> {{ $data['email'] }}</p>
<p><strong>الجوال:</strong> {{ $data['phone'] }}</p>
<p><strong>الشركة:</strong> {{ $data['company'] ?? '-' }}</p>
<p><strong>الرسالة:</strong></p>
<p>{{ $data['message'] }}</p>