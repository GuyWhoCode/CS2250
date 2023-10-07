const mathCalculation = document.getElementById("mathCalculation");
const numberButton = document.querySelectorAll(
    ".calcButton:not(.operator, #clearBtn)"
);
const operationButtons = document.getElementsByClassName("operator");
let numbers = [];
let operations = [];
let currentNumber = "";
let calculationDone = false;

const enterNumberButtonValue = (event) => {
    const buttonValue = event.currentTarget.innerText;
    mathCalculation.innerHTML += buttonValue;
    currentNumber = parseFloat(currentNumber + buttonValue);
    // Stores the current number as a float. Allows for multi-digit numbers
};

/**
 * Clears the calculation and related information
 */
const clearCalculation = () => {
    mathCalculation.innerHTML = "";
    currentNumber = 0;
    numbers = [];
    operations = [];
};

const calculate = () => {
    while (numbers.length > 1) {
        let multiplyIndex = operations.indexOf("x");
        let divideIndex = operations.indexOf("/");
        let addIndex = operations.indexOf("+");
        let subtractIndex = operations.indexOf("-");
        if (
            (multiplyIndex < divideIndex || !operations.includes("/")) &&
            multiplyIndex !== -1
        ) {
            numbers.splice(
                multiplyIndex,
                2,
                numbers[multiplyIndex] * numbers[multiplyIndex + 1]
            );
            operations.splice(multiplyIndex, 1);
            continue;
        } else if (
            (divideIndex < multiplyIndex || !operations.includes("x")) &&
            divideIndex !== -1
        ) {
            numbers.splice(
                divideIndex,
                2,
                numbers[divideIndex] / numbers[divideIndex + 1]
            );
            operations.splice(divideIndex, 1);
            continue;
        } else if (
            (addIndex < subtractIndex || !operations.includes("-")) &&
            addIndex !== -1
        ) {
            numbers.splice(
                addIndex,
                2,
                numbers[addIndex] + numbers[addIndex + 1]
            );
            operations.splice(addIndex, 1);
            continue;
        } else if (
            (subtractIndex < addIndex || !operations.includes("+")) &&
            subtractIndex !== -1
        ) {
            numbers.splice(
                subtractIndex,
                2,
                numbers[subtractIndex] - numbers[subtractIndex + 1]
            );
            operations.splice(subtractIndex, 1);
            continue;
        }
        // Prioritizes multiplication and division over addition and subtraction using index of operators
    }

    mathCalculation.innerHTML = numbers[0];
    currentNumber = numbers[0];
    calculationDone = true;
    // Flag to allow for result to be reused in next calculation
};

Object.values(numberButton).forEach((element) => {
    element.addEventListener("click", enterNumberButtonValue);
});

Object.values(operationButtons).forEach((element) => {
    let operation = element.innerText;

    element.addEventListener("click", () => {
        if (!calculationDone || numbers[numbers.length - 1] !== currentNumber) {
            numbers.push(currentNumber);
        }
        // Accounts for case after user has calculated one operation

        calculationDone = false;
        currentNumber = 0;
        // Resets the current number to 0 to allow for more numbers to be inputted

        if (operation === "=") {
            calculate();
        } else {
            mathCalculation.innerHTML += operation;
            operations.push(operation);
        }
    });
});
