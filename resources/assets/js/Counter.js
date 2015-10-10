class Counter {

  constructor() {

    this.count = 0;

    setInterval(function() {
      this.tick();
    }.bind(this), 1000);

  }

  tick() {
    this.count++;
    console.log(this.count);
  }

}
