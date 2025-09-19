<script>
    document.addEventListener('DOMContentLoaded', switchTab());

    /** Переключает вкладку авторизации и регистрации,
     * используя метод от Bootstrap,
     * в зависимости от GET-параметра "action"
     * 
     * @returns {void}
    */
    function switchTab() {
        const params = new URLSearchParams(window.location.search);
        
        let action = params.get('action');

        if (action) {
            if (action === 'sign-in') action = 'signin';
            if (action === 'sign-up') action = 'signup';

            const tabTrigger = document.querySelector(`#${action}-tab`);

            if (tabTrigger) {
                const tab = new bootstrap.Tab(tabTrigger);
                tab.show();
            }
        }
    }
</script>