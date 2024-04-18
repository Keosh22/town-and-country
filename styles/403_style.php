<style>
    @import url('https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Josefin+Slab:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


    * {
        margin: 0;
        overflow: hidden;

        box-sizing: border-box;
        max-height: 100vh;
    }

    body {
        background: rgb(34, 193, 195);
        background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(253, 187, 45, 1) 100%);
        padding: 1rem;
        display: grid;
        grid-template-areas:
            "header"
            "main"
        ;
        grid-template-rows: 30% 70%;
        gap: 3rem;
    }

    .header {
        grid-area: header;
        display: grid;
        place-items: center;
    }

    .img>img {
        height: 200px;
        width: 150px;

    }

    main {
        grid-area: main;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;


    }

    .top {
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .top p {
        font-family: "Josefin Slab", serif;
        font-size: 2em;
        color: #005248;
    }

    .text_code {
        font-family: "Josefin Slab", serif;
        font-size: 4em;
        color: black;
    }


    .code {
        font-family: "Archivo", sans-serif;
        font-size: 6em;
        color: #005248;
    }

    .top h3 {
        font-family: "Archivo", sans-serif;
        font-size: 1.2em;
        color: #2F4858;
    }

    .bn632-hover {
        width: 160px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        margin: 20px;
        height: 55px;
        text-align: center;
        border: none;
        background-size: 300% 100%;
        border-radius: 50px;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .bn632-hover:hover {
        background-position: 100% 0;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .bn632-hover:focus {
        outline: none;
    }

    .bn632-hover.bn20 {
        background-image: linear-gradient(to right,
                #2F4858,
                #764ba2,
                #6b8dd6,
                #8e37d7);
        box-shadow: 0 4px 15px 0 rgba(116, 79, 168, 0.75);
    }
</style>