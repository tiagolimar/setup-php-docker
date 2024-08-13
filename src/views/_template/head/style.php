<style>
    a.nav-link.active{
        font-weight: bold;
    }
    ul.navbar-nav > li.nav-item:not(:last-of-type){
        border-right: 1px solid black;
    }
    body {
        display: flex;
        flex-direction: column;
        height: 100vh;
        margin: 0;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .content-wrapper {
        overflow-y: auto;
        flex-grow: 1;
    }

    footer {
        position: sticky;
        bottom: 0;
        z-index: 1000;
    }

    @media (max-width:476px){
        table{
            font-size: 0.75em;
        }
    }
</style>