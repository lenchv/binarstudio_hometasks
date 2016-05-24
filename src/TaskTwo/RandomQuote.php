<?php 
namespace TaskTwo;

trait RandomQuote {
	private $arQuote = array(
			"The day is what you make it! So why not make it a great one?",
			"Write it on your heart that every day is the best day in the year.",
			"Being miserable is a habit; being happy is a habit; and the choice is yours.",
			"You cannot tailor-make the situations in life but you can tailor-make the attitudes to fit those situations.",
			"Things turn out best for the people who make the best of the way things turn out.",
			"And how a change in thoughts can lead to a change in life.",
			"The greatest discovery of all time is that a person can change his future by merely changing his attitude.",
			"Optimism is the most important human trait, because it allows us to evolve our ideas, to improve our situation, and to hope for a better tomorrow.",
			"Be a yardstick of quality. Some people aren't used to an environment where excellence is expected.",
			"Success is a lousy teacher. It seduces smart people into thinking they can't lose.",
			"A friendship founded on business is a good deal better than a business founded on friendship.",
			"I have not failed. I've just found 10,000 ways that won't work.",
			"Luck is a dividend of sweat. The more you sweat, the luckier you get.",
			"Whether you think that you can, or that you can't, you are usually right.",
			"High expectations are the key to everything."
		);
	public function getQuote() {
		return $this->arQuote[rand(0, count($this->arQuote)-1)];
	} 
}

class Greeting {
	use RandomQuote;
	public function say($name) {
		return "Hi, $name! There is a new quote for you: " . $this->getQuote();
	}
}
