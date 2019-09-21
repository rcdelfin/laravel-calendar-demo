Date.prototype.isBetween = isBetween;
function isBetween(minDate, maxDate) {
    if (!this.getTime) {
        throw new Error('isBetween() was called on a non Date object');
    }

    return !minDate ? true : this.getTime() >= minDate.getTime()
        && !maxDate ? true : this.getTime() <= maxDate.getTime();
};
