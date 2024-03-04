<x-mail::message>
### Dear, {{ $email }}

🔒 Welcome to Daycode Newsletter, your front line in secure digital access. To ensure the best protection for your information, we send you this exclusive OTP:

## DC- {{ $token }}

Enter this code carefully to access our portal. The OTP will expire in the next hour.

Get ready to be inspired, informed, and empowered to make the most of technology in your personal and professional life. Your journey starts now!

Keep an eye on your inbox for our first Newsletter, packed with exciting content and valuable insights that you won't find anywhere else.

Thank you for choosing Daycode as your trusted source for all things tech. We're thrilled to have you on board!

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
