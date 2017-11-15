package resalSocial;

import java.util.Collection;
import java.util.Observable;
import java.util.Set;

import facebookGhost.FacebookGhostNetwork;
import grapheSimple.GrapheSimple;
import grapheX.Sommet;
import reseauSocial.core.MemberInterface;
import reseauSocial.core.SocialNetworkInterface;

public class ReseauSocial implements SocialNetworkInterface{
	String nom;
	GrapheSimple g = new GrapheSimple();
	
	public ReseauSocial(String nom){this.nom = nom;}

	@Override
	public void update(Observable arg0, Object arg1) {
	}

	@Override
	public MemberInterface getMember(String identifier) {
		return (MemberInterface) g.getSommet(identifier);
	}

	@Override
	public Collection<? extends MemberInterface> getMembers() {
		return (Collection<? extends MemberInterface>) g.sommets();
	}

	@Override
	public MemberInterface addMember(String identifier, int age, String description) {
		Membre m = new Membre(identifier,age,description);
		g.ajouterSommet(m);
		return m;
	}

	@Override
	public MemberInterface addMember(String ident, boolean belongsToAnotherNetwork) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void relate(int force, MemberInterface member, MemberInterface friend) {
		g.ajouterArc((Sommet) member, (Sommet) friend, force);
	}

	@Override
	public Set<? extends MemberInterface> relateToRank(MemberInterface member, int rank) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public int distance(MemberInterface member1, MemberInterface member2) {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	public void setOtherNetwork(FacebookGhostNetwork f) {
		// TODO Auto-generated method stub
		
	}
	
}
