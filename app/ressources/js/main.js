export {
    TestClass
};


class TestClass {
    constructor()
    {
        this.test = 'Un test';
    }
    toString()
    {
        console.log(this.test);
    }
}

test = new TestClass();
test.toString();