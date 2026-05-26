@extends('layouts.app')

@section('content')
<div class="failed-body">

<div class="failed-card">
    <div class="failed-icon">
        <i class="fas fa-times-circle"></i>
    </div>

    <h1 class="failed-title">لم تتم عملية الدفع</h1>
    
    <div class="failed-submessage">
        <i class="fas fa-credit-card" style="margin-left: 6px;"></i> 
        حدث خلل أثناء معالجة الدفع
    </div>

    <div class="failed-button-container">
        <a href="{{route('welcome')}}" class="failed-btn-home" id="failedHomeBtn">
            <i class="fas fa-home"></i> العودة إلى الرئيسية
        </a>
    </div>

    <div class="failed-footer">
        <i class="far fa-clock"></i> لم يتم خصم أي مبلغ من حسابك. 
        في حال وجود استفسار، الرجاء التواصل على الرقم 0549892127.
        <span class="failed-reference">
            <i class="fas fa-hashtag"></i> رقم مرجع العملية: <strong>{{$payment['order']}}</strong>
        </span>
    </div>
</div>

</div>
@endsection
