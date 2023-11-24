import Game from "./Game";
import { HashRouter, Routes, Route } from "react-router-dom";
import Navbar from "./Navbar";
import Home from "./Home";
import Word from "./Word";

export default function App() {
    return (
        <main>
            <HashRouter basename="/">
                <Navbar />
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/game" element={<Game />} />
                    <Route path="/words" element={<Word />} />
                </Routes>
            </HashRouter>
        </main>
    );
}
