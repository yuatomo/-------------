console.log("start");
const fs = require("fs");
fs.readFile("../index.html", "utf8", (err, data) => {
    console.log(data);
});
console.log("end");