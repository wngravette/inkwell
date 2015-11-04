@extends('email.master')
@section('content')
<table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%">
  <tbody><tr>
    <td class="padded" style="padding: 0;vertical-align: middle;padding-left: 56px;padding-right: 56px;word-break: break-word;word-wrap: break-word">

<h2 style="font-style: normal;font-weight: bold;Margin-bottom: 0;Margin-top: 0;font-size: 16px;line-height: 24px;font-family: Ubuntu,sans-serif;color: #3e4751">{{$name}}, please confirm your email address.&nbsp;</h2><p class="font-cabin" style="font-style: normal;font-weight: 400;font-family: cabin,avenir,sans-serif;Margin-bottom: 22px;Margin-top: 16px;font-size: 13px;line-height: 22px;color: #7c7e7f">This verifies your account, meaning you can see more stats and we can let you know of important information should we need to.&nbsp;</p>

    </td>
  </tr>
</tbody></table>

<table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%">
  <tbody><tr>
    <td class="padded" style="padding: 0;vertical-align: middle;padding-left: 56px;padding-right: 56px;word-break: break-word;word-wrap: break-word">

<div class="btn" style="Margin-bottom: 22px;Margin-top: 0;text-align: left">
<![if !mso]><a style="border-radius: 3px;display: inline-block;font-size: 14px;font-weight: 700;line-height: 24px;padding: 13px 35px 12px 35px;text-align: center;text-decoration: none !important;transition: opacity 0.2s ease-in;font-family: Cabin,Avenir,sans-serif;background-color: #4eaacc;color: #fff" href="{{$domain}}/verify/{{$confirm_code}}">Verify my Account</a><![endif]>
<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="{{url('verify')}}/{{$confirm_code}}" style="width:194px" arcsize="7%" fillcolor="#4EAACC" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,12px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FFFFFF;font-family:sans-serif;font-weight:700;mso-line-height-rule:exactly;mso-text-raise:4px">Verify my Account</center></v:textbox></v:roundrect><![endif]--></div>

    </td>
  </tr>
</tbody></table>
@endsection
