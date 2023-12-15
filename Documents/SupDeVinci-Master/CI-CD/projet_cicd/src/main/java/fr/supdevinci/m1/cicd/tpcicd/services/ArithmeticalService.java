package fr.supdevinci.m1.cicd.tpcicd.services;

import org.springframework.stereotype.Service;

@Service
public class ArithmeticalService {
    
    /**
     * @param aa param 1
     * @param b param 2
     * @return
     */
    public String concaString(Object a, Object b = null) {
        if (null == a) {
            return "";
        }
        return a.toString() + b.toString();
    }

}
