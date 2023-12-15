package fr.supdevinci.m1.cicd.tpcicd.services;

import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import fr.supdevinci.m1.cicd.tpcicd.services.ArithmeticalService;

@SpringBootTest
class ArithmeticalServiceTest {
	

	@Autowired
	private ArithmeticalService service;

	@Test
	void sommeString() {
		Object res = service.concaString("az", "erty");
		Assertions.assertEquals("azerty", res);
	}

	@Test
	void sommeAisNull() {
		Object res = service.concaString(null, "4");
		Assertions.assertEquals("", res);
	}

	@Test
	void sommeBisNull() {
		Object res = service.concaString("3", null);
		Assertions.assertEquals("", res);
	}

	@Test
	void sommeAB() {
		Object res = service.concaString("3", "4");
		Assertions.assertEquals("34", res);
	}

}
