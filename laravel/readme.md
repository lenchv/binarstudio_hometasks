# Home task 5

Task:
Create first Laravel application
Create class Smartphone which represents some phone details info. Our smartphone should consist of following parts: Name: string: e.g. Sony Xperia, Apple iPhone CPU (Processor) - requested info: vendor (e.g. Qualcomm 5555), cores (e.g. 4) Display - requested info: resolution (480x320) Camera - requested info: mpixels(2, 4, 8 whatever) Battery - requested info: capacity (1234 mAh)
Instantiate your Smartphone via IoC and pass it's instance to route /phone. When user follow this route he should get info about your smartphone in following format:

Apple iPhone, Qualcomm 5555 2 cores, 480x320 display, 8 megapixels camera, battery capacity 1234 mAh.

Important Output this info in minimum echos.

Load bit.ly (shorten url) library via composer to your project. Register on this service in order to get credentials. Create another one route in your app named /shorten. When user follow this url return him shortened link of what ever you want. For example: Your link was http://google.com. After bit.ly shorten it will be in format http://bit.ly/0xAbccDx
<hr />
For bit.ly was used library <a href="https://packagist.org/packages/jelovac/bitly4laravel">jelovac/bitly4laravel</a><br />
Class Smartphone in directory app/lib/hometask/
