import Game from "./Game";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from "./Navbar";
import Home from "./Home";
import Activity from "./Activity";

export default function App() {
    return (
        <main>
            <BrowserRouter basename="/">
                <Navbar />
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/game" element={<Game />} />
                    <Route path="/activity" element={<Activity />} />
                </Routes>
            </BrowserRouter>
        </main>
    );
}
