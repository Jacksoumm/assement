<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool4cars</title>
  <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
    <strong>Changer de client : </strong>
    <button onclick="switchClient('clienta')">Client A</button>
    <button onclick="switchClient('clientb')">Client B</button>
    <button onclick="switchClient('clientc')">Client C</button>
</nav>

    <div class="dynamic-div" data-module="cars" data-script="list"></div>
    <script>
    function getCookie(name) {
        const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? match[2] : null;
    }

    function setCookie(name, value) {
        document.cookie = name + '=' + value + '; path=/; SameSite=Strict';
    }

    function loadModule(module, script, extraParams) {
        const client = getCookie('client') || 'clienta';
        const params = $.extend({ client, module, script }, extraParams || {});
        $.get('ajax.php', params, function(data) {
            $('.dynamic-div').html(data);
        });
    }

    function switchClient(clientId) {
        setCookie('client', clientId);
        loadModule('cars', 'list');
    }

    $(document).ready(function() {
        if (!getCookie('client')) setCookie('client', 'clienta');
        const $div = $('.dynamic-div');
        loadModule($div.data('module'), $div.data('script'));
    });
</script>
</body>
</html>
