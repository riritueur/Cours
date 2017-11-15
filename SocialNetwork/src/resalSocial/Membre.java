package resalSocial;

import java.util.HashMap;

import grapheX.Sommet;
import reseauSocial.core.MemberInterface;

public class Membre extends Sommet implements MemberInterface{
	String nom;
	int age;
	String descr;
	
	HashMap<Membre, Integer> relations = new HashMap<Membre, Integer>();
	
	public Membre(String nom, int age, String descr){
		super(nom);
		this.nom = nom;
		this.age = age;
		this.descr = descr;
	}

	@Override
	public int getAge() {
		return age;
	}

	@Override
	public String getDescription() {
		return descr;
	}

	@Override
	public String ident() {
		return nom;
	}
}
