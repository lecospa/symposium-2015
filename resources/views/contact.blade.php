@extends('layouts.master')

@section('body')
<div class="page-header">
	<h1>Contact Us</h1>
</div>
<div class="row">
	<div class="col-md-6"><h4>PHONE</h4><p><a href="tel:+886-2-33665187">+886-2-33665187</a></p></div>
	<div class="col-md-6"><h4>ADDRESS</h4><p>R806, New Physics Building, National Taiwan University No.1, Sec.4, Roosevelt Road, Taipei 10617, Taiwan(R.O.C)</p></div>
</div>
<div class="row">
	<div class="col-md-6"><h4>FAX</h4><p><a href="tel:+886-2-23655473">+886-2-23655473</a></p></div>
	<div class="col-md-6"><h4>EMAIL</h4><p><a href="mailto:ntulecospa@ntu.edu.tw">ntulecospa@ntu.edu.tw</a></p></div>
</div>
<script>
document.getElementById('nav-contact').classList.add('active');
</script>
@endsection
