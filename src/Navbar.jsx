import { NavLink } from "react-router-dom";

function Navbar() {
    return (
        <nav>
            <NavLink to="/"> Home</NavLink>
            <br />
            <NavLink to="/game"> Game</NavLink>
            <br />
            <NavLink to="/words"> Words</NavLink>
        </nav>
    );
}

export default Navbar;
