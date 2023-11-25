import { NavLink } from "react-router-dom";
import "./Navbar.css";

function Navbar() {
    return (
        <nav>
            <NavLink to="/"> Home</NavLink>
            <br />
            <NavLink to="/game"> Game</NavLink>
            <br />
            <NavLink to="/activity"> Activities</NavLink>
        </nav>
    );
}

export default Navbar;
