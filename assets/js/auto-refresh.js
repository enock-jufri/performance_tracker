// ...existing code for scoreboard auto-refresh...
function refreshScoreboard() {
    fetch('../public/scoreboard_data.php')
        .then(res => res.text())
        .then(html => {
            document.getElementById('scoreboard-body').innerHTML = html;
        });
}

setInterval(refreshScoreboard, 5000); 

// Initial load
window.onload = refreshScoreboard;
