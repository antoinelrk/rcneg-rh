<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>FACTURE</title>
    <style>
        @font-face {
            font-family : "Bebas Neue";
            src: url({{ public_path('\fonts\BebasNeue-Regular.ttf')}});
        }
        @font-face {
            font-family : "Roboto";
            src: url({{ public_path('\fonts\Roboto-Regular.ttf') }});
        }
        @font-face {
            font-family : "Roboto Light";
            src: url({{ public_path('\fonts\Roboto-Light.ttf') }});
        }
        @font-face {
            font-family : "Roboto Bold";
            src: url({{ public_path('\fonts\Roboto-Bold.ttf') }});
        }

        body {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .rcneg-logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 4cm;
            height: 4cm;
        }
        .rcneg-information {
            position: absolute;
            top: 5mm;
            right: 0;
            width: auto;
            height: 3cm;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
        }

        .member-component {
            position: absolute;
            top: 4.5cm;
            right: 0;
            width: 7cm;
            color: #161b20;
        }
        .member-name {
            font-family: "Roboto Bold", sans-serif;
            font-size: 4mm;
        }
        .member-address {
            margin-top: 1mm;
            font-family: "Roboto", Calibri, sans-serif;
            line-height: 4.5mm;
            font-size: 3.5mm;
        }

        .content {
            position: absolute;
            top: 10cm;
            width: 100%;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
        }

        .separator {
            position: absolute;
            top: 9cm;
            width: 1cm;
            height: .2mm;
            background-color: black;
        }

        .vignette {
            position: relative;
            float: left;
            margin: 2cm 25%;
            width: 9cm;
            height: 5.5cm;
            padding: .25cm;

            border-radius: 4px;
            border: dashed black 1px;
        }
        .vignette img {
            display: flex;
            margin-top: 15px;
            width: 3cm;
            height: 3cm;
        }
        .vignette h2 {
            position: absolute;
            right: 1cm;
            font-size: 22px;
        }

        .vignette h3 {
            position: absolute;
            top: 1.3cm;
            right: 1cm;
            font-size: 16px;
        }
        .vignette h4 {
            position: absolute;
            top: 2.5cm;
            right: 1cm;
            font-size: 16px;
        }
        .vignette h5 {
            position: absolute;
            top: 4.75cm;
            right: 2.3cm;
            text-align: center;
            font-size: 12px;
            font-style: italic;
            font-family: "Roboto Light", Calibri, sans-serif;
            font-weight: 400;
            color: #363636;
        }

        .foot {
            position: absolute;
            top: 24cm;
            right: 2cm;
            line-height: 5mm;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
        }



    </style>
</head>

<body>
<img src="{{ public_path() . '/img/ui/rcneg.png' }}" alt="" class="rcneg-logo">
<div class="rcneg-information">
    RadioClub National du Personnel des Industries Electrique et Gazière<br>
    CCAS<br>
    8 rue de Rosny &mdash; BP.629<br>
    93104 &mdash; Montreuil
</div>

<div class="member-component">
    <div class="member-name">{{ $member->last_name }} {{ $member->first_name }}</div>
    <div class="member-address">
        {{ $member->address }} <br>
        {{ $member->postal_code }} {{ $member->city }} <br>
        {{ $member->region }} {{ $member->country }}
    </div>
</div>

<div class="separator"></div>

<div class="content">
    <p>
        Nous avons bien reçu votre versement représentant le montant de votre cotisation et nous vous en remercions.
        Nous vous prions de trouver ci-joint la vignette valable pour l'année {{ $date->format('Y') }}.
    </p>

    <div class="vignette">
        <img src="{{ public_path() . '/img/ui/rcneg.png' }}" alt="">
        <h2>RCN-EG  {{ $date->format('Y') }}</h2>
        <h3>{{ substr($member->last_name, 0, 8) }} {{ $member->first_name }}</h3>
        <h4>{{ $member->indicative ?? 'SWL' }} &mdash; N°{{ $member->member_code }}</h4>
        <h5>Valable jusqu'au 31 Décembre {{ $date->format('Y') }}</h5>
    </div>
</div>

<div class="foot">
    Cordiales amitiés<br>
    Le Secretaire, F4HOI
</div>


<!--<div class="footer">TVA non applicable, art. 293 du CGI</div> -->

</body>
</html>
