@extends('website.layout.app')
@section('title','Lujien Shop')
@section('content')
<h1>يرجى تأكيد بريدك الإلكتروني</h1>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">إعادة إرسال رابط التحقق</button>
</form>

@endsection