document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("registroForm");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = new FormData(form);
        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("message").innerHTML = data;
        })
        .catch(error => {
            document.getElementById("message").innerHTML = '<h3 class="bad"> ¡UPS HA OCURRIDO UN ERROR! </h3>';
        });
    });
});
