import { useState } from "react";

function ActivityInfo({activity, type, price}) {
    return <>
        <h2>{activity}</h2>
        <p>Type: {type}</p>
        <p>Price: {price}</p>
    </>;
}

function Activity() {
    const [activity, setActivity] = useState(null);

    async function getActivityInfo(event) {
        event.preventDefault();
        const amount = event.target.elements.amount.value;
        const response = await fetch(
            `http://www.boredapi.com/api/activity?participants=${amount}`
        );
        const data = await response.json();
        setActivity(data);
    }

    return (
        <div>
            <h1>Bored?</h1>
            <p>
                Get some information about some activities you can do to pass
                the time.
            </p>
            <form onSubmit={getActivityInfo}>
                <label htmlFor="amount">Number of Participants: </label>
                <input
                    type="number"
                    placeholder="Enter number"
                    name="amount"
                />
                <input type="submit" value="Submit" />
            </form>
            <hr />
            <ActivityInfo {... activity} />
        </div>
    );
}

export default Activity;
