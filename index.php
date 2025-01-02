<form id="dataForm">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Submit</button>
</form>
<script src="/assets/js/validation.js"></script>
<script>
    document.getElementById('dataForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        const formData = new FormData(this);
        // Send data to validation.js for validation
        validateData(formData);
    });
</script>