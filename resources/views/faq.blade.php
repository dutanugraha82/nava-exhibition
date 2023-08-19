@extends('master')
@section('page-title')
    Nava Exhibition | FAQ
@endsection
@push('css')
<style>
    .banner{
    height: 95vh;
    background-image: url("/img/faq-banner.jfif");
    background-position: center;
    mix-blend-mode: lighten;
    opacity: 0.4;
    background-size: cover;
    filter: saturate(200%);
}

.banner-content {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
text-align: center;
color: white;
width: 22rem;
}
</style>
@endpush
@section('content')
<div class="banner" style="margin-top: 5rem;">
</div>
<div class="banner-content" style="position: absolute; top: 58%; left: 50%; transform: translate(-50%, -50%);">
    <p style="font-size: 1.6rem;" class="fs-montserrat mt-3"><b>Frequent Asked Questions (FAQ)</b></p style="font-size: 1.8em;">
</div>
<div class="container mt-4" style="margin-bottom: 200px">
    <p class="fs-montserrat text-white">Frequent Asked Questions (FAQ)</p>
    <ul class="pr-1">
        <li class="fs-montserrat text-white">Is there a specific time slot for entry into the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        All ticket-holders are MANDATORY/COMPULSORY to check-in to the exhibition by reserving their spot before you visit the exhibition (Subject to availability), even on weekdays, weekends, and public holidays. You may still visit the exhibition on the designated date if you fail to make a reservation; however, there is possibility that you may not be able to visit the exhibition at your preferred time slot. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Can we buy tickets at the exhibition itself?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        Yes, once the exhibition is open, you can buy tickets on spot by scanning the QR code and reaching our official website. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Are tickets valid for 1 person only?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        Yes, tickets only admit 1 person, depending on the ticket category purchased. One ticket cannot be used for multiple persons for entry. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">I bought my ticket from the official website. Who do I contact with questions or concerns?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        If you have any questions or concerns about your ticket, please contact the organizer directly via email (navaartspace@gmail.com) or DM Instagram @navaexhibition. 
    </p>
    
    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Can I use a ticket purchased from a non-authorized seller?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        No, tickets purchased from non-authorized sellers will not be honored. The organizer reserves the right to refuse admission to anyone unable to verify the identity of the ticket purchaser or the validity of the ticket. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Is there a refund or exchange policy for tickets?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        No, all ticket sales are final. There are no refunds or exchanges. We apologize for any inconvenience this may cause. However, tickets are transferrable to your friends and relatives. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">How do I redeem my ticket for the NAVA Exhibition event?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        To redeem your ticket for the event, please present the QR code on your ticket at the event entrance. Please make sure that the QR code is valid and has not been used for check-in before. If you have any issues with your ticket, please contact the organizers directly for assistance. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">What is a weekday pass?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The weekday pass is only available for visits during weekdays (Monday - Thursday, except Public Holidays), and it is required to reserve your spot on the organiser's website. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Is there a limit to the number of people entering the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        There will be certain crowd control SOPs, in order to adhere to fire safety rules as advised by authorities. As such, there is a queue system, and ushers will assist to move visitors through the exhibition in an orderly fashion. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Are there any discounted rates for school groups?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        If you wish to organise school groups, please do contact the organiser @navaexhibition OR email to (navaartspace@gmail.com). 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Is the event space wheelchair accessible?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The event space is wheelchair accessible, only pram/ stroller is not allowed. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">What is NAVA Exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        Nava Exhibition is an exhibition of digital art, light illustrations, and a roller skating area. It is hoped that this will be the start for the advancement of entertainment in Karawang. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Where is the exhibition located?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        Gramedia World Karawang (3rd floor) - kav. V, Jl. Galuh Mas Raya, Sukaharja, Telukjambe Timur, Karawang, Jawa Barat 41361. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">What are the opening times for the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The opening times for NAVA Exhibition is 10am - 8pm every day. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">When does the exhibition start?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The NAVA Exhibition starts on 25th September 2023. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">When does the exhibition end?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The NAVA Exhibition ends on 25th October, 2023. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">How long do we need to go through the NAVA Exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The exhibition takes an estimated 1 hour from start to finish, though it depends on every individual. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">How can I find out more about the NAVA Exhibition event?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        To learn more about the event, visit the official website at www.navaexhibition.co.id. You can find information about the exhibition, tickets, location, and more on the website. You can also contact the organizers directly via email (navaartspace@gmail.com) or DM Instagram @navaexhibition for any further questions or concerns. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Who is responsible for the content of the NAVA Exhibition event?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The event is organized by Great A Creative. If you have any questions or concerns about the event, please contact the organizers directly via email (navaartspace@gmail.com) or DM Instagram @navaexhibition for any further questions or concerns. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Can I leave my child alone in the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        You are not advised to leave your children unattended in the exhibition, as the organiser will not be responsible for the safety of your unattended child. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Is NAVA Exhibition safe for people with photosensitive epilepsy?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        NAVA Exhibition the Experience does not include smoke, haze, or strobe lights. While the projected images and animations within the experience are slow-moving, please be advised that some moving light may trigger seizures in some people. If you are sensitive to moving light or have been diagnosed with photosensitive epilepsy, please be cautious and let our friendly staff know if you are feeling unwell. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Can we bring food and drinks into the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        Food and drinks are not allowed in the exhibition proper, unless otherwise specified. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Are there any merchandise we can buy in the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        Yes, there is a selection of curated merchandise in relation to the exhibition, at the end of the journey. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Are there lockers for my belongings in the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        The organiser does not provide lockers in the exhibitions. 
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">Can I organise a private event within the exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        If you have any enquiries for event bookings, please do contact the organiser directly via email (navaartspace@gmail.com) or DM Instagram @navaexhibition for any further questions or concerns.
    </p>

    <ul class="pr-1 mt-4">
        <li class="fs-montserrat text-white">How do I partner with the NAVA exhibition?</li>
    </ul>
    <p class="fs-montserrat text-white mx-1">
        For any enquiries on brand partnership, please do contact the organiser directly via email (navaartspace@gmail.com) or DM Instagram @navaexhibition for any further questions or concerns.
    </p>

</div>
@endsection