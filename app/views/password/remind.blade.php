<form action="{{ URL::to('reminders/remind') }}" method="POST">
    <input type="email" name="email">
    <input type="submit" value="Hatırlatıcı Gönder">
</form>