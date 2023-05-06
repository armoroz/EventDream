@extends('layouts.app')
@section('content')


<h1 style="text-align: center; margin-top: 20px; font-family: Garamond, serif;">About Us</h1>

  <section>
  <div>
    <h2> Mission statement</h2>
    <p>Our mission at the event management system is to create unforgettable experiences for our clients and their guests. We strive to deliver exceptional service, innovative solutions, and attention to detail in every aspect of event planning and execution. Our goal is to exceed our clients' expectations by providing personalized experiences that reflect their vision and objectives. We are committed to making each event unique, memorable, and successful, and we aim to achieve this through collaboration, creativity, and professionalism. Our mission is to be the go-to event management system for all types of events, from corporate meetings to social gatherings, and to make a positive impact on our clients' lives and communities..</p>
  </div>

  <div>
    <h2> FAQ</h2>
    <p><strong>Can I visit the venue before booking?</strong></p>
    <p>Yes, we encourage clients to visit the venue before booking to ensure it meets their needs. You can schedule a visit through our website.  </p>
	<p><strong>What is your cancellation policy?</strong></p>
	<p>Our cancellation policy varies based on the event and the venue. We will work with you to determine the best course of action in the event of a cancellation.</p>
	<p><strong>What kind of events do you manage?</strong></p>
	<p>We manage a variety of events, from weddings and corporate events to concerts and festivals. Our team is experienced in managing events of all sizes and types.</p>
	<p><strong>What does a your company do?</strong><p>
	<p>Our company provides services to manage, operate and maintain event. These services can include booking events, handling event logistics, maintaining the property, managing supplier relationships, and more.
  </div>

  <div>
    <h2>Team</h2>
    <ul>
      <li>Shalini Kuruguntla - Developer and CEO</li>
      <li>Endy Ukandu - Developer and CEO</li>
      <li>Arina Moroz - Web Designer, Analyst, and CEO</li>
    </ul>
  </div>

  <footer>
    <p>Event Dream. All rights reserved.</p>
  </footer>
</section>

<style>

.col-lg-8 {
	min-width: 1000px;
}

.card {
	background-color: transparent;
	border: none;
}

section {
	box-shadow: 0 6px 21px rgba(0,0,0,1);
	padding: 30px;
	margin-top: 40px;
}

</style>
@endsection('content')