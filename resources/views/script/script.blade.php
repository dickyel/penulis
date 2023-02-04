<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('./vendor/jquery/jquery.slim.min.js') }}"></script>

<script src="{{ asset('./vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>

<script src="{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.js') }}"></script>
<script>
    AOS.init();
</script>

<script src="{{ asset('./script/navbar-scroll.js') }}"></script>


<script src="{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.js') }}"></script>
<script>
    const navbar = document.querySelector('.col-navbar')
    const cover = document.querySelector('.screen-cover')

    const sidebar_items = document.querySelectorAll('.sidebar-item')

    function toggleNavbar() {
        navbar.classList.toggle('d-none')
        cover.classList.toggle('d-none')
    }

    function toggleActive(e) {
        sidebar_items.forEach(function(v, k) {
            v.classList.remove('active')
        })
        e.closest('.sidebar-item').classList.add('active')

    }
</script>

