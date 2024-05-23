<script>
// Send the user's IP address to your email
function sendIP() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.ipify.org?format=json", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            var ip = response.ip;
            // Create a mailto link with the IP address
            var subject = "User IP Address";
            var body = "The user's IP address is: " + ip;
            var mailtoLink = "mailto:Royce.vansumeren@icloud.com?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
            // Open the default email client with the mailto link
            window.location.href = mailtoLink;
        }
    }
    xhr.send();
}

// Call the function to send the IP when the page loads
sendIP();
</script>