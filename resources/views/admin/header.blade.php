<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a id="pushmenuButton" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var pushmenuButton = document.getElementById('pushmenuButton');
        pushmenuButton.addEventListener('click', function() {
            document.body.classList.toggle('sidebar-collapse');
        });
    });
</script>
