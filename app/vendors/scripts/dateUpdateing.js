const startDate = document.getElementById("start_date");
    const kickOffDate = document.getElementById("kick_off_date");
    const finishDate = document.getElementById("finish_date");

    startDate.addEventListener("change", function() {
    const selectedDate = new Date(this.value);
    const oneMonthLater = new Date(selectedDate.setMonth(selectedDate.getMonth() + 1));
    const sixMonthsLater = new Date(selectedDate.setMonth(selectedDate.getMonth() + 6));

    kickOffDate.value = oneMonthLater.toISOString().slice(0, 10);
    finishDate.value = sixMonthsLater.toISOString().slice(0, 10);

    kickOffDate.disabled = false;
    finishDate.disabled = false;
  });