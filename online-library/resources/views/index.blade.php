<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "d8d9f842-0030-45d0-8e35-6eb1f8a9a69e",
      safari_web_id: "web.onesignal.auto.33b67024-44c4-4b60-aec5-91af5568c874",
      notifyButton: {
        enable: true,
      },
      allowLocalhostAsSecureOrigin: true,
    });
  });
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="{{ asset('assets/uikit.min.css') }}" />
    <script src="../uikit/js/uikit.min.js"></script>
    <script src="../uikit/js/uikit-icons.min.js"></script>
</head>
<body>
    
    <div id="app">
        <calendar></calendar>
    </div>




<script src="{{ asset('assets/uikit.min.js') }}"></script>
<script src="{{ asset('assets/uikit-icons.min.js') }}"></script>
<script src="./js/app.js"></script>
</body>
</html>