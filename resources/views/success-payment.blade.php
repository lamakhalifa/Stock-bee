@extends('layouts.app')

@section('content')
<div class="success-page-body">

<div class="success-page-confetti-bg" id="confettiContainer"></div>

<div class="success-page-card">
    <div class="success-page-icon-circle">
        <i class="fas fa-check-circle"></i>
    </div>
     <h1 class="success-page-title">! تم الدفع بنجاح</h1>
    <div class="success-page-sub">شكراً لثقتك 🌟</div>
    <div class="success-page-payment-details" id="paymentDetails">
        <div class="success-page-detail-row">
            <span class="success-page-detail-label"><i class="fas fa-hashtag"></i> رقم العملية</span>
            <span class="success-page-detail-value">{{$payment['order']}}</span>
        </div>
        <div class="success-page-detail-row">
            <span class="success-page-detail-label"><i class="fas fa-calendar-alt"></i> تاريخ الدفع</span>
            <span class="success-page-detail-value" >  {{ \Carbon\Carbon::parse($payment['created_at'])->format('Y-m-d') }}</span>
        </div>
        <div class="success-page-detail-row">
            <span class="success-page-detail-label"><i class="fas fa-receipt"></i> المبلغ الإجمالي</span>
            <span class="success-page-detail-value success-page-amount-highlight" >{{ $payment['amount_cents_bigint'] / 100 }}<img src="{{ asset('images/Riyal-DLbomx9S.svg') }}" class="riyal" alt="Riyal"></span>
        </div>
    </div>

    <div class="success-page-action-buttons">
        <a href="{{route('welcome')}}" class="success-page-btn-home" id="backHomeBtn">
            <i class="fas fa-home"></i> العودة للرئيسية
        </a>
    </div>
</div>

@endsection
