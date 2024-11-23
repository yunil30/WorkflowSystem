<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
</head>
<style>
    body{
        margin: 0;
        height: 100vh;
        display: grid;
        grid-template-columns: 15rem 1fr;
        grid-template-rows: 3rem 1fr 3rem;
        grid-template-areas: 
            "sidebar header"
            "sidebar main"
            "sidebar footer";
    }

    body.sidebar-minimize{
        grid-template-columns: 3rem 1fr;
        background-color: black;
    }

    .page-header{
        grid-area: header;
        background-color: lightslategray;
    }

    .page-header button{
        grid-area: header;
        background-color: lightslategray;
    }

    .page-sidebar{
        grid-area: sidebar;
        background-color: black;
    }

    .page-main{
        grid-area: main;
        background-color: lightcyan;
        padding: 1rem;
    }

    .page-footer{
        grid-area: footer;
        background-color: lightslategray;
    }
</style>
<body>
    <header class="page-header">
        <button type="button" id="resize">
            =
        </button>
    </header>

    <aside class="page-sidebar">

    </aside>

    <main class="page-main">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nihil pariatur id accusantium non aspernatur ullam quos quaerat dicta corrupti iure rerum molestias quibusdam distinctio officiis, veniam quae recusandae excepturi.</p>

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, a temporibus, sint ut dignissimos et voluptatem ad quo ratione non illum dicta! Quis maiores distinctio cupiditate, quidem quaerat dolor culpa?</p>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla natus est iste, enim autem modi reprehenderit, dicta suscipit cum nihil consectetur error ut eum ipsam. Iusto eum aliquid reiciendis obcaecati?</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium recusandae possimus modi iure consequuntur dolor delectus? Nam illo quis ipsam culpa illum numquam libero totam, accusamus optio sunt quam quae.</p>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem sed quisquam repudiandae neque nihil cumque dolores perspiciatis nostrum corrupti at laborum perferendis eius eveniet, dolorem ullam incidunt, repellat numquam commodi?</p>
    </main>

    <footer class="page-footer">
    
    </footer>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#resize').click(function() {
        $('body').toggleClass('sidebar-minimize');
    });

</script>