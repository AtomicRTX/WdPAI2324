function generateTimeOptions(interval) {
    const selectTime = document.getElementById('selectTime');
    selectTime.innerHTML = '';

    for (let hour = startHour; hour < endHour; hour += interval) {
        const option = document.createElement('option');
        const formattedHour = hour.toString().padStart(2, '0');
        option.value = formattedHour + ':00';
        option.textContent = formattedHour + ':00';
        selectTime.appendChild(option);
    }
}


const defaultInterval = 1;
generateTimeOptions(defaultInterval);