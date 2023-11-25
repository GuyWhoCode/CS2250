import "./Home.css";
function Preview({ title, description, imageLink }) {
    return (
        <section className="preview">
            <img src={imageLink} alt={title} />
            <h3>{title}</h3>
            {description}
        </section>
    );
}

function Home() {
    return (
        <main>
            <br />
            <br />
            <section id="previewMenu">
                <Preview
                    title="Tic-tac-toe"
                    description={
                        <p>
                            We offer a simple <a href="/game">Tic-tac-toe</a>!
                        </p>
                    }
                    imageLink="https://img.gamedistribution.com/abebecfa89b646448c834963627b325d-512x512.jpeg"
                />
                <Preview
                    title="Activities"
                    description={
                        <p>
                            Bored? Come check out some potential activities to
                            do! <a href="/activity">Activities</a>
                        </p>
                    }
                    imageLink="https://img.freepik.com/premium-vector/bored-panda-cute-kawaii-hand-drawn-doodle-bored-lazy-panda_42174-190.jpg?w=360"
                />
            </section>
        </main>
    );
}

export default Home;
