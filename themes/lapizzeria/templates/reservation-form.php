<form class="reservation-form" method="post">
    <h2>Make a Reservation</h2>
    <div class="field">
        <input type="text" name="name" placeholder="Name" required>
    </div>
    <div class="field">
        <input type="datetime-local" name="date" placeholder="Date" step="300" required>
    </div>
    <div class="field">
        <input type="email" name="email" placeholder="Email" required>
    </div>
    <div class="field">
        <input type="number" size="10" maxlength="8" name="phone" placeholder="Phone Number" required>
    </div>
    <div class="field">
        <textarea type="textarea" name="message" placeholder="Any comments for us?" rows=10></textarea>
    </div>
    <div class="field">
        <input class="button primary" type="submit" name="reservation" value="Send" required>
    </div>
    <input type="hidden" name="hidden" value="1">

</form> 