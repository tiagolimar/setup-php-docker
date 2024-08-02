<script>
    const links = document.querySelectorAll('a.nav-link');
    for (const link of links){
        const pathname = link.getAttribute('href');
        if (window.location.pathname == pathname){
            link.classList.add('active');
            break;
        }
    }
</script>