export const formatDateTime = (dateTime) => {
    const options = {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    };
    return new Date(dateTime).toLocaleString(undefined, options);
};
