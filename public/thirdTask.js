(function () {
    async function sendVisit() {
        const payload = {
            url: window.location.href,
            user_agent: navigator.userAgent,
            language: navigator.language,
            screen: `${window.screen.width}x${window.screen.height}`
        };

        try {
            const url = window.TrackerConfig.apiUrl;
            await fetch(url, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(payload)
            });
        } catch (e) {
            console.error('Tracking error', e);
        }
    }

    sendVisit();
})();
